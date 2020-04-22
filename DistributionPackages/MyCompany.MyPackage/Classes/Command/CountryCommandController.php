<?php
namespace MyCompany\MyPackage\Command;

/*
 * This file is part of the MyCompany.MyPackage package.
 */

use MyCompany\MyPackage\Domain\Model\Country;
use MyCompany\MyPackage\Domain\Repository\CountryRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class CountryCommandController extends CommandController
{

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
     * @param string $requiredArgument This argument is required
     * @param string $optionalArgument This argument is optional
     * @return void
     */
    public function exampleCommand($requiredArgument, $optionalArgument = null)
    {
        $this->outputLine('You called the example command and passed "%s" as the first argument.', array($requiredArgument));
    }

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
     * @param string $countryname This argument is required
     * @param string $optionalArgument This argument is optional
     * @return void
     */
    public function addCountryCommand($countryname, $optionalArgument = null)
    {
        $myCountry = new Country();
        $myCountry->setName($countryname);

        $this->countryRepository->add($myCountry);
        $this->outputLine('The dancer %s has been added to the repository', array($countryname));
    }
}
