<?php

    namespace App\Services;

    class RecuperaParametro
    {
        public function parametro($request):string
        {
            $utm_source = $request->query('utm_source');
            $utm_compaign = $request->query('utm_compaign');
            $utm_medium = $request->query('utm_medium');
            $utm_content = $request->query('utm_content');

            $parametros = "?utm_source={$utm_source}&utm_compaign={$utm_compaign}&utm_medium={$utm_medium}&utm_content{$utm_content}";
            
            return $parametros;
        }
    }