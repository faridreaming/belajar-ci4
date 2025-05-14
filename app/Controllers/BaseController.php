<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\GambarModel;
use App\Models\PrestasiModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $session;

    protected $adminModel;
    protected $beritaModel;
    protected $gambarModel;
    protected $prestasiModel;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
        $this->session = \Config\Services::session();

        $this->adminModel = new \App\Models\AdminModel();
        $this->gambarModel = new \App\Models\GambarModel();
        $this->beritaModel = new \App\Models\BeritaModel();
        $this->prestasiModel = new \App\Models\PrestasiModel();
    }

    /**
     * Check if user is logged in as admin
     * 
     * @return bool
     */
    protected function isLoggedIn()
    {
        return $this->session->has('admin_id');
    }

    /**
     * Require admin authentication
     * Redirects to login page if not authenticated
     */
    protected function requireLogin()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }
    }

    /**
     * Get current admin data
     * 
     * @return array|null
     */
    protected function getCurrentAdmin()
    {
        if ($this->isLoggedIn()) {
            return $this->adminModel->find($this->session->get('admin_id'));
        }
        return null;
    }
}
