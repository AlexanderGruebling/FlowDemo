<?php
namespace MyCompany\MyPackage\Controller;

/*
 * This file is part of the MyCompany.MyPackage package.
 */

use MyCompany\MyPackage\Domain\Model\Country;
use MyCompany\MyPackage\Domain\Model\Dancer;
use MyCompany\MyPackage\Domain\Repository\CountryRepository;
use MyCompany\MyPackage\Domain\Repository\DancerRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\I18n\Locale;
use Neos\Flow\Mvc\Controller\ActionController;

class StandardController extends ActionController
{

    /**
     * @Flow\Inject
     * @var Neos\Flow\I18n\Service
     */
    protected $localizationService;


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

    public function indexAction()
    {
        $this->view->assign('foos', array(
            'bar', 'baz'
        ));
    }

    public function listDancersAction()
    {
        $detectedLocale = new Locale('de');
        $this->localizationService->getConfiguration()->setCurrentLocale($detectedLocale);
        $this->view->assign('locale', $detectedLocale);
        $dancers = $this->dancerRepository->findAll();
        $this->view->assign('dancers', $dancers);
    }

    public function addDancerAction() {
        $detectedLocale = new Locale('de');
        $this->localizationService->getConfiguration()->setCurrentLocale($detectedLocale);
        $this->view->assign('locale', $detectedLocale);
        $countries = $this->countryRepository->findAll()->toArray();
        $this->view->assign('countries', $countries);
    }

    /**
     * @param Dancer $newDancer
     * @throws \Neos\Flow\Mvc\Exception\StopActionException
     * @throws \Neos\Flow\Persistence\Exception\IllegalObjectTypeException
     */
    public function createDancerAction(Dancer $newDancer)
    {
        $this->dancerRepository->add($newDancer);
        $this->addFlashMessage('Created a new post.');
        $this->redirect('listDancers');
    }

    /**
     * @param Dancer $deleteDancer
     * @throws \Neos\Flow\Mvc\Exception\StopActionException
     * @throws \Neos\Flow\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteDancerAction(Dancer $deleteDancer)
    {
        $this->dancerRepository->remove($deleteDancer);
        $this->redirect('listDancers');
    }

    /**
     * @param Dancer $dancer
     * @throws \Neos\Flow\I18n\Exception\InvalidLocaleIdentifierException
     */
    public function editAction(Dancer $dancer)
    {
        $detectedLocale = new Locale('de');
        $this->localizationService->getConfiguration()->setCurrentLocale($detectedLocale);
        $this->view->assign('locale', $detectedLocale);
        $countries = $this->countryRepository->findAll()->toArray();
        $this->view->assign('dancer', $dancer);
        $this->view->assign('countries', $countries);
    }

    /**
     * @param Dancer $dancer
     * @throws \Neos\Flow\Mvc\Exception\StopActionException
     * @throws \Neos\Flow\Persistence\Exception\IllegalObjectTypeException
     */
    public function updateDancerAction(Dancer $dancer)
    {
        $this->dancerRepository->update($dancer);
        $this->addFlashMessage('Created a new post.');
        $this->redirect('listDancers');
    }

    public function listCountriesAction()
    {
        $countries = $this->countryRepository->findAll();
        $this->view->assign('countries', $countries);
    }

}
