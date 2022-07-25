<?php

require '../services/menu-service.php';

function toJson($dtos)
{
    $json = [];
    foreach ($dtos as $dto) $json[] = $dto->toJson();
    return json_encode($json);
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            try {
                echo '{"data":' . toJson(MenuService::fetchAll()) . '}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'fetchByRestaurantId':
            try {
                echo '{"data": "' . toJson(MenuService::fetchByRestaurantId($_REQUEST['id'])) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'add':
            try {
                $menu = json_decode($_REQUEST['menu']);
                echo '{"data": "' .
                    MenuService::add(new MenuDTO(NULL, $menu->name, $menu->createDate, $menu->modifyDate, $menu->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'delete':
            try {
                $menu = json_decode($_REQUEST['menu']);
                echo '{"data": "' .
                    MenuService::delete(new MenuDTO($menu->id, $menu->name, $menu->createDate, $menu->modifyDate, $menu->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'update':
            try {
                $menu = json_decode($_REQUEST['menu']);
                echo '{"data": "' .
                    MenuService::update(new MenuDTO($menu->id, $menu->name, $menu->createDate, $menu->modifyDate, $menu->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        default:
            echo '{"error": "Invalid action: ' . $_REQUEST['action'] . '"}';
            break;

    }
} else {
    echo '{"error": "No action specified"}';
}
