<?php


namespace JeroenNoten\LaravelMenu\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['text', 'url'];
}