<?php

namespace Mangati\Exporter;

use Mangati\IO\InputInterface;
use Mangati\IO\OutputInterface;

/**
 * ExporterInterface
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
interface ExporterInterface
{
    public function export(InputInterface $input, OutputInterface $output);
}
