<?php

function mounth($mes)
{
    switch($mes)
    {
        case 1:
            return "enero";
            break;

        case 2:
            return "febrero";
            break;

        case 3:
            return "marzo";
            break;

        case 4:
            return "abril";
            break;

        case 5:
            return "mayo";
            break;

        case 6:
            return "junio";
            break;

        case 7:
            return "julio";
            break;

        case 8:
            return "agosto";
            break;
    
        case 9:
            return "septiembre";
            break;

        case 10:
            return "octubre";
            break;

        case 11:
            return "noviembre";
            break;

        case 12:
            return "diciembre";
            break;
    }
}

function find_by_id_queals($collections, $id_to_search)
{
    foreach($collections as $collection)
    {
        if($collection->pelicula_genero_id === $id_to_search)
            return true;
    }

    return false;
}

?>