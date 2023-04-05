<?php

namespace App\Repositories;

use JetBrains\PhpStorm\ArrayShape;

class PollRepository
{
    protected string $modelName = 'App\Models\PollModel';
    public mixed $model;

    public function __construct()
    {
        $this->model = model($this->modelName);
    }

    #[ArrayShape(['items' => "mixed", 'total' => "mixed"])]
    public function getPollsByParams($query, $sort_field, $sort_direction,  $limit, $page):array
    {
        $polls = $this->model->builder()->select(['id','title','created_at'])->orderBy($sort_field, $sort_direction);

        if($query !== ""){
            $polls = $polls->groupStart()
                ->where('id', $query)
                ->orLike('title', $query)
                ->orLike('description', $query)
                ->groupEnd();
        }

        $pollCount = clone $polls;
        $items = $polls->limit($limit, (($page - 1) * $limit))->get()->getResult();
        $total = $pollCount->countAllResults();

        return [
            'items' => $items,
            'total' => $total,
        ];
    }
}