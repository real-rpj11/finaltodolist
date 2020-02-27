<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'tasks', 'description', 'due',
    ];


    protected $hidden = [
        'timestamps',
    ];

    public function insert($data)
    {
        $this->create([
            'tasks' => $data['tasks'],
            'description' => $data['description'],
            'due' => Carbon::now()->format('Y-m-d'),
        ]);
    }

    public function getAll()
    {
        return $this->get();
    }

    public function edit($data)
    {
        $this->where('id',$data['id'])->update([
            'tasks'=>$data['task'],
            'description'=>$data['description'],
            'due'=>$data['due'],
            ]);
    }

    public function del($data) 
    {
        $this->where('id', $data)->delete([]);
    }
}