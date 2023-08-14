<?php 

        $config['base_url'] = 'http://localhost:81/ci_tiga/buku/index';
        
        // style pagination
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        
        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_link'] = '&laquo';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" style="background-color: #20c9a6; border-color: #20c9a6;">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = ['class' => 'page-link'];

        // end style pagination