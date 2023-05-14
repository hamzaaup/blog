<?php

    /**
    * The blog page controller
    */
    class BlogController
    {
        private $model;
        //We will pass model object to controller here
        function __construct($model)
        {
            $this->model = $model;
        }

        public function index()
        {
            $this->blogs = $this->model->getBlogs();
        }

        public function viewBlog()
        {
            $this->blogs = $this->model->getBlogs();
        }

    }