<?php

namespace App\Http;
use \Closure;
use \Exception;

class Router
{
    /**
     * URL completa do projeto
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Índice de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instância de request
     * @var Request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo das rotas
     */
    public function setPrefix()
    {
        $parseUrl = parse_url($this->url);

        $this->prefix = substr($parseUrl['path'], 0, -1) ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = [])
    {
        // validação dos parâmetros
        foreach ($params as $key=>$value)
        {
            if ($value instanceof Closure)
            {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // padrão de validação URL
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        // adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota GET
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

      /**
     * Método responsável por definir uma rota GET
     * @param string $route
     * @param array $params
     */
    public function post($route, $params = [])
    {
        return $this->addRoute('POST', $route, $params);
    }

      /**
     * Método responsável por definir uma rota GET
     * @param string $route
     * @param array $params
     */
    public function put($route, $params = [])
    {
        return $this->addRoute('PUT', $route, $params);
    }

      /**
     * Método responsável por definir uma rota GET
     * @param string $route
     * @param array $params
     */
    public function delete($route, $params = [])
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Método responsável por retornar a URI sem os prefixos
     * @return string
     */
    private function getUri()
    {
        // uri da request
        $uri = $this->request->getUri();

        // divide a uri com o prefixo
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        return end($xUri);
    }

    /**
     * Método responsável por retornar os dados da rota atual
     * @return array
     */
    private function getRoute()
    {
        //URI
        $uri = $this->getUri();

        $httpMethod = $this->request->getHttpMethod();
        
        foreach($this->routes as $patternRoute=>$methods)
        {
            if (preg_match($patternRoute, $uri)) 
            {
                if($methods[$httpMethod])
                {
                    return $methods[$httpMethod];
                } throw new Exception("Error processing request", 405);
            } throw new Exception("URL não encontrada! :(", 404);
        }
    }

    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try {
            $route = $this->getRoute();

            if(!isset($route['controller']))
            {
                throw new Exception("Error processing request!", 500);
            }

            $args = [];
            
            return call_user_func_array($route['controller'], $args);

        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }




}