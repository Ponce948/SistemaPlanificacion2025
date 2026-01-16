<?php

namespace App\Controllers;

use Framework\Validator;

class EntidadesController
{
    public function index()
    {
        $entidades = db()->query('SELECT * FROM entidades ORDER BY id DESC')->get();

        view('entidades', [
            'title'      => 'Entidades del sector público',
            'entidades'  => $entidades,
        ]);
    }

    public function create()
    {
        view('entidades-create', [
            'title'  => 'Registrar entidad',
            'errors' => [],
        ]);
    }

    public function store()
    {
        $validator = new Validator($_POST, [
            'codigo'         => 'required|min:2|max:50',
            'nombre'         => 'required|min:3|max:190',
            'subsector'      => 'required|min:3|max:190',
            'nivel_gobierno' => 'required|min:3|max:100',
            'estado'         => 'required',
        ]);

        if ($validator->passes()) {
            db()->query(
                'INSERT INTO entidades (codigo, nombre, subsector, nivel_gobierno, estado, fecha_creacion, fecha_actualizacion)
                 VALUES (:codigo, :nombre, :subsector, :nivel_gobierno, :estado, CURDATE(), CURDATE())',
                [
                    'codigo'         => $_POST['codigo'],
                    'nombre'         => $_POST['nombre'],
                    'subsector'      => $_POST['subsector'],
                    'nivel_gobierno' => $_POST['nivel_gobierno'],
                    'estado'         => $_POST['estado'],
                ]
            );

            redirect('/entidades');
        }

        view('entidades-create', [
            'title'  => 'Registrar entidad',
            'errors' => $validator->errors(),
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            redirect('/entidades');
        }

        $entidad = db()->query(
            'SELECT * FROM entidades WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        if (!$entidad) {
            redirect('/entidades');
        }

        view('entidades-edit', [
            'title'   => 'Editar entidad',
            'entidad' => $entidad,
            'errors'  => [],
        ]);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            redirect('/entidades');
        }

        $validator = new Validator($_POST, [
            'codigo'         => 'required|min:2|max:50',
            'nombre'         => 'required|min:3|max:190',
            'subsector'      => 'required|min:3|max:190',
            'nivel_gobierno' => 'required|min:3|max:100',
            'estado'         => 'required',
        ]);

        if ($validator->passes()) {
            db()->query(
                'UPDATE entidades
                 SET codigo = :codigo,
                     nombre = :nombre,
                     subsector = :subsector,
                     nivel_gobierno = :nivel_gobierno,
                     estado = :estado,
                     fecha_actualizacion = CURDATE()
                 WHERE id = :id',
                [
                    'id'             => $id,
                    'codigo'         => $_POST['codigo'],
                    'nombre'         => $_POST['nombre'],
                    'subsector'      => $_POST['subsector'],
                    'nivel_gobierno' => $_POST['nivel_gobierno'],
                    'estado'         => $_POST['estado'],
                ]
            );

            redirect('/entidades');
        }

        $entidad = db()->query(
            'SELECT * FROM entidades WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        view('entidades-edit', [
            'title'   => 'Editar entidad',
            'entidad' => $entidad,
            'errors'  => $validator->errors(),
        ]);
    }

    public function destroy()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            db()->query(
                'DELETE FROM entidades WHERE id = :id',
                ['id' => $id]
            );
        }

        redirect('/entidades');
    }
}
