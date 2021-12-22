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

        foreach (['1', '2'] as $part) {
            $result = $parts[$part]['result'];
            $ms = $parts[$part]['ms'];

            $output->write(sprintf('Part %d: ', $part));

            if (false !== strpos((string) $result, PHP_EOL)) {
                $longestLine = max(array_map(fn (string $line): int => strlen($line), explode(PHP_EOL, $result)));
                $separator = PHP_EOL . str_repeat('-', $longestLine) . PHP_EOL;

                $output->writeln(
                    sprintf(
                        '%s<info>%s</info>%s(<info>~%.2f</info> ms)',
                        $separator,
                        $result,
                        $separator,
                        $ms,
                    ),
                );
            } else {
                $output->writeln(
                    sprintf('<info>%s</info> (<info>~%.2f</info> ms)', $result, $ms),
                );
            }
        }

        return Command::SUCCESS;
    }
}
