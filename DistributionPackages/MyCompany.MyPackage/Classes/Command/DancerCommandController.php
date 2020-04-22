<?php
namespace MyCompany\MyPackage\Command;

/*
 * This file is part of the MyCompany.MyPackage package.
 */

use MyCompany\MyPackage\Domain\Model\Dancer;
use MyCompany\MyPackage\Domain\Repository\CountryRepository;
use MyCompany\MyPackage\Domain\Repository\DancerRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class DancerCommandController extends CommandController
{

    /**
 * @Flow\Inject
 * @var DancerRepository
 */
    protected $dancerRepository;

    /**
     * @Flow\Inject
     * @var CountryRepository
     */
    protected $countryRepository;

    /**
     * An example command
     *
     * The comment of this command method is also used for TYPO3 Flow's help screens. The first line should give a very short
     * summary about what the command does. Then, after an empty line, you should explain in more detail what the command
     * does. You might also give some usage example.
     *
     * It is important to document the parameters with param tags, because that information will also appear in the help
     * screen.
     *
     * @param string $dancername This argument is required
     * @param string $optionalArgument This argument is optional
     * @return void
     */
    public function addDancerCommand($dancername)
    {
        $myDancer = new Dancer();
        $myDancer->setName($dancername);

        $this->dancerRepository->add($myDancer);

        $this->outputLine('The dancer %s has been added to the repository', array($dancername));
    }
}
