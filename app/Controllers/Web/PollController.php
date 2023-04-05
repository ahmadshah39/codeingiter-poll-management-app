<?php

namespace App\Controllers\Web;
use App\Controllers\BaseController;
use App\Repositories\PollRepository;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class PollController extends BaseController
{
    use ResponseTrait;
    protected mixed $repository;

    public function __construct()
    {
        $this->repository = new PollRepository();
    }

    /**
     * @return string|ResponseInterface
     */
    public function index():string|ResponseInterface
    {
        $sort_fields = ['id', 'title', 'created_at'];
        $sort_direction = $this->request->getVar('sort_direction') == ('DESC'|'desc') ? 'DESC' : 'ASC';
        $sort_field = in_array($this->request->getVar('sort_field'), $sort_fields) ? $this->request->getVar('sort_field') : 'id';
        $query = $this->request->getVar('query') ? $this->request->getVar('query') : '';
        $limit = $this->request->getVar('limit') ? $this->request->getVar('limit') : 10;
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $getPollsByParams =  $this->repository->getPollsByParams(query: $query, sort_field: $sort_field, sort_direction: $sort_direction, limit: $limit, page: $page);

        $data = [
            'limit' => $limit,
            'page' => $page,
            'total' => $getPollsByParams['total'],
            'sort_field'=> $sort_field,
            'sort_direction'=> $sort_direction,
            'query' => $query,
            'url' => base_url().'polls',
            "fields" => [
                [
                    "key" => 'id',
                    "title" => 'Sr no #',
                    "sr_only" => false,
                    "sortable" => true,
                ],
                [
                    "key" => 'title',
                    "title" => 'title',
                    "sr_only" => false,
                    "sortable" => true,
                ],
                [
                    "key" => 'created_at',
                    "title" => 'Created at',
                    "sr_only" => false,
                    "sortable" => true,
                ],
                [
                    "key" => 'actions',
                    "title" => 'Actions',
                    "sr_only" => true,
                    "sortable" => false,
                ],
            ],
            "limitOptions" =>[ 10, 20, 50, 100]
        ];


        if($this->request->is('post')){
            return $this->respond($getPollsByParams, 200);
        }

        return view('pages/poll/index', ['data'=> $data]);
    }

    /**
     * @return string|ResponseInterface
     */
    public function create():string|ResponseInterface
    {
        return view('pages/poll/create');
    }

    /**
     * @return string|ResponseInterface
     */
    public function store():string|ResponseInterface
    {

    }

    /**
     * @return string|ResponseInterface
     */
    public function edit():string|ResponseInterface
    {

    }

    /**
     * @return string|ResponseInterface
     */
    public function update():string|ResponseInterface
    {

    }

    /**
     * @return string|ResponseInterface
     */
    public function destroy():string|ResponseInterface
    {

    }

}
