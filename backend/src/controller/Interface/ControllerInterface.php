<?php 

interface ControllerInterface
{
    public function create();
	public function read();
    public function update();
    public function delete();
    public function save();
}