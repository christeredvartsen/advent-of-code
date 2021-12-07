<?php declare(strict_types=1);
namespace AoC\Command;

use AoC\Solver;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function AoC\getInputFile;

class Solve extends Command
{
    protected static $defaultName = 'solve';
    protected static $defaultDescription = 'Solve a day in the calendar';

    protected function configure(): void
    {
        $this
            ->setHelp('This command will run the solver for a given day.')
            ->addArgument('day', InputArgument::REQUIRED, 'The day to solve')
            ->addArgument('year', InputArgument::OPTIONAL, 'The calendar year', date('Y'));
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $day  = (int) $input->getArgument('day');
        $year  = (int) $input->getArgument('year');

        if (1 > $day || 25 < $day) {
            $output->writeln('<error>Invalid day: ' . $day . '</error>');
            return Command::FAILURE;
        }

        $dayAsString = sprintf('%02d', $day);

        $output->write([
            $header = 'Solving ' . date('M jS, Y', strtotime($year . '-12-' . $dayAsString)),
            str_repeat('=', strlen($header)),
        ], true);

        $solverName = 'AoC\\Y' . $year . '\\Dec' . $dayAsString;

        if (!class_exists($solverName)) {
            $output->writeln('<error>No solve for this day (yet)</error>');
            return Command::FAILURE;
        }

        $solver = new $solverName();

        if (!$solver instanceof Solver) {
            $output->writeln('<error>Solver does not currently implement Aoc\\Solver</error>');
            return Command::FAILURE;
        }

        $data = getInputFile($day, $year);
        $parts = [
            '1' => [
                'result' => null,
                'time' => null,
            ],
            '2' => [
                'result' => null,
                'time' => null,
            ],
        ];

        $start = microtime(true);
        $parts['1']['result'] = $solver->solvePart1($data);
        $parts['1']['ms'] = (microtime(true) - $start) * 1000;

        $start = microtime(true);
        $parts['2']['result'] = $solver->solvePart2($data);
        $parts['2']['ms'] = (microtime(true) - $start) * 1000;

        $output->write([
            sprintf('Part 1: <info>%d</info> (<info>~%.2f</info> ms)', $parts['1']['result'], $parts['1']['ms']),
            sprintf('Part 2: <info>%d</info> (<info>~%.2f</info> ms)', $parts['2']['result'], $parts['2']['ms']),
        ], true);

        return Command::SUCCESS;
    }
}
