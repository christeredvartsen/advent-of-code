<?php declare(strict_types=1);
namespace AoC\Command;

use AoC\Solver;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

        $day = sprintf('%02d', $day);

        $output->write([
            $header = 'Solving ' . date('M jS, Y', strtotime($year . '-12-' . $day)),
            str_repeat('=', strlen($header)),
        ], true);

        $solverName = 'AoC\\Y' . $year . '\\Dec' . $day;

        if (!class_exists($solverName)) {
            $output->writeln('<error>No solve for this day (yet)</error>');
            return Command::FAILURE;
        }

        $solver = new $solverName();

        if (!$solver instanceof Solver) {
            $output->writeln('<error>Solver does not currently implement Aoc\\Solver</error>');
            return Command::FAILURE;
        }

        $data = file_get_contents(__DIR__ . '/../../input/' . $year . '/' . $day . '.txt');

        $output->write([
            'Part 1: <info>' . $solver->solvePart1($data) . '</info>',
            'Part 2: <info>' . $solver->solvePart2($data) . '</info>',
        ], true);

        return Command::SUCCESS;
    }
}
