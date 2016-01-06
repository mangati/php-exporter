<?php

namespace Mangati\Exporter;

use Mangati\IO\InputInterface;
use Mangati\IO\OutputInterface;

/**
 * Exporter
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
class Exporter implements ExporterInterface
{
    
    public function export(InputInterface $input, OutputInterface $output)
    {
        $input->open();
        $output->open();
        
        while (($entry = $input->read()) !== false) {
            if ($entry !== null) {
                $output->write($entry);
            }
        }
        
        $input->close();
        $output->close();
    }
    
}