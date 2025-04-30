<?php

declare(strict_types=1);

return [
    'listTitle' => 'Lista de ordenes',
    'addOrder' => 'Agregar nueva orden',
    'editOrder' => 'Editar orden',
    'headers' => [
        'client' => 'Cliente',
        'branch' => 'Sucursal',
        'total' => 'Total',
        'status' => 'Estado',
        'typeDelivery' => 'Tipo de delivery',
        'deliveryMan' => 'Domiciliario',
        'createdAt' => 'Creado',
        'updatedAt' => 'Actualizado',
        'actions' => 'Aciones',
    ],
    'empty' => 'No hay órdenes registradas.',
    'actions' => [
        'edit' => 'Editar',
        'delete' => 'Eliminar',
        'confirmDeleteMessage' => '¿Está seguro de que desea eliminar esta orden?',
    ],
    'forms' => [
        'save' => 'Guardar',
        'cancel' => 'Cancelar',
        'client' => [
            'label' => 'Cliente',
            'placeholder' => 'Seleccione un cliente...',
        ],
        'branch' => [
            'label' => 'Sucursal',
            'placeholder' => 'Seleccione una sucursal...',
        ],
        'total' => [
            'label' => 'Total',
            'placeholder' => 'Ingrese el total...',
        ],
        'status' => [
            'label' => 'Estado',
            'placeholder' => 'Seleccione un estado...',
            'options' => [
                'pendiente' => 'Pendiente',
                'en_preparacion' => 'En Preparación',
                'listo' => 'Listo',
                'entregado' => 'Entregado',
            ],
        ],
        'typeOfDelivery' => [
            'label' => 'Tipo de entrega',
            'placeholder' => 'Seleccione un tipo de entrega...',
            'options' => [
                'en_local' => 'Se recoge en el local',
                'a_domicilio' => 'Domicilio',
            ],
        ],
        'deliveryMan' => [
            'label' => 'Domiciliario',
            'placeholder' => 'Seleccione un domiciliario...',
            'options' => [
                'en_local' => 'Se recoge en el local',
                'a_domicilio' => 'Domicilio',
            ],
        ],
    ],
];
