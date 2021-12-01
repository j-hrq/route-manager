<?php

namespace App\Http;

class Response {

    /**
     * Código do Status HTTP (OK)
     * @var int
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do response
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode     = $httpCode;
        $this->content      = $content;
        $this->contentType  = $contentType;
    }

    /**
     * Método responsável por alterar o content type do response
     * @param $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de response
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar a resposta ao usuário
     */
    public function sendResponse()
    {
        // ENVIA OS HEADERS
        $this->sendHeaders();

        // IMPRIME O CONTEÚDO
        switch ($this->contentType)
        {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }

    /**
     * Método responsável por enviar os headers para o navegador
     */
    private function sendHeaders()
    {
        //STATUS
        http_response_code($this->httpCode);

        // Enviar Headers
        foreach($this->headers as $key=>$value)
        {
            header($key. ': ' .$value);
        }
    }


}