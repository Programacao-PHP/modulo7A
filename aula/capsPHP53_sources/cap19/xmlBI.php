<?php

class xmlBI {

    var $xml_parser;
    var $xml_file;
    var $html;
    var $open_tag ;
    var $close_tag ;

// Classe Construtora 
    function xmlBI() {
        $this->xml_parser =  "";
        $this->xml_file =  "";
        $this->html =  "";
        $this->open_tag = array(
             "BI" =>  "\n<!-- XML Começa nesta parte -->\n<table border=1 width=500><tr><td width=500>",
             "NUMERO-BI"     =>  "<table border=0 width=200><tr><td width=200>",
             "NUMERO" =>  "<font face=verdana size=2>",
             "DIGITO-CONTROLO"  =>  "<font face=verdana size=2>&nbsp;-&nbsp;",
             "EMISSAO"  =>  "<table border=0 width=300><tr><td width=300>",
             "DATA" =>  "<font face=verdana size=2>",
             "LOCAL" =>  "<font face=verdana size=2>&nbsp;-&nbsp;",
             "NOME" =>  "<table border=0 width=500><tr><td width=500><font face=verdana size=2><b>",
             "FILIACAO" =>  "<table border=0 width=500><tr><td width=500>",
             "PAI" =>  "<font face=verdana size=2>",
             "MAE" =>  "<font face=verdana size=2>&nbsp;-&nbsp;",
             "NATURALIDADE" =>  "<table border=0 width=500><tr><td width=500>",
             "FREGUESIA" =>  "<font face=verdana size=2>",
             "CONCELHO" =>  "<font face=verdana size=2>&nbsp;-&nbsp;",
             "RESIDENCIA" =>  "<table border=0 width=500><tr><td width=500>",
             "DATA-DE-NASCIMENTO" =>  "<table border=0 width=500><tr><td width=200><font face=verdana size=2>",
             "ESTADO-CIVIL" =>  "<td width=200><font face=verdana size=2>",
             "ALTURA" =>  "<td width=200><font face=verdana size=2>",
             "VALIDADE" =>  "<td width=200><font face=verdana size=2>"
        );
        $this->close_tag = array(
             "BI" =>  "\n</td></tr></table><!-- XML Termina nesta parte -->\n",
             "NUMERO-BI"     =>  "</td></tr></table>",
             "NUMERO" =>  "</font>",
             "DIGITO-CONTROLO"  =>  "</font>",
             "EMISSAO"  =>  "</td></tr></table>",
             "DATA" =>  "</font>",
             "LOCAL" =>  "</font>",
             "NOME" =>  "</b></font></td></tr></table>",
             "FILIACAO" =>  "</td></tr></table>",
             "PAI" =>  "</font>",
             "MAE" =>  "</font>",
             "NATURALIDADE" =>  "</td></tr></table>",
             "FREGUESIA" =>  "</font>",
             "CONCELHO" =>  "</font>",
             "RESIDENCIA" =>  "</td></tr></table>",
             "DATA-DE-NASCIMENTO" =>  "</font></td>",
             "ESTADO-CIVIL" =>  "</font></td>",
             "ALTURA" =>  "</font></td>",
             "VALIDADE" =>  "</font></td></tr></table>"
        );
        
        }
//Class Destrutora (tem que ser invocada manualmente uma vez que o PHP não suporta destrutores) 
    function destroy() {
            xml_parser_free($this->xml_parser);
    }
                
    function concat($str) {
        $this->html .= $str;
    }    

    function startElement($parser, $name, $attrs) {
        //global $open_tag; 
    
        if ($format= $this->open_tag[$name]) {
            $this->html .= $format;
        }
    }

    function endElement($parser, $name) {
        //global $close_tag;

        if ($format= $this->close_tag[$name]) {
            $this->html .= $format;
        }
    }

    function characterData($parser, $data) {
        $this->html .= $data;
    }

    function parse() {
        $this->xml_parser = xml_parser_create();
        xml_set_object($this->xml_parser, &$this);
        xml_parser_set_option($this->xml_parser, XML_OPTION_CASE_FOLDING, true);
        xml_set_element_handler($this->xml_parser,  "startElement",  "endElement");
        xml_set_character_data_handler($this->xml_parser,  "characterData");

        if (!($fp = fopen($this->xml_file,  "r"))) {
            die( "Não foi possível abrir o ficheiro de XML.");
        }    

        while ($data = fread($fp, 4096)) {
	        if (!xml_parse($this->xml_parser, $data, feof($fp))) {
        	        die(sprintf( "Erro de XML: %s na linha %d",
                             xml_error_string(xml_get_error_code($this->xml_parser)),
                             xml_get_current_line_number($this->xml_parser)));
                }
        }


    }
}

?>
