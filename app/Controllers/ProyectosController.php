<?php

namespace App\Controllers;

use Framework\Validator;

class ProyectosController
{
    public function index()
    {
        $proyectos = db()->query('SELECT * FROM proyectos ORDER BY id DESC')->get();

        view('proyectos', [
            'title'     => 'Proyectos de inversión',
            'proyectos' => $proyectos,
        ]);
    }

    public function create()
    {
        view('proyectos-create', [
            'title'  => 'Registrar proyecto de inversión',
            'errors' => [],
        ]);
    }

    public function store()
    {
        $validator = new Validator($_POST, [
            'nombre'    => 'required|min:3|max:190',
            'tipologia' => 'required|min:3|max:190',
            'entidad'   => 'required|min:3|max:190',
            'estado'    => 'required',
        ]);

        if ($validator->passes()) {
            db()->query(
                'INSERT INTO proyectos (nombre, tipologia, entidad, estado)
                 VALUES (:nombre, :tipologia, :entidad, :estado)',
                [
                    'nombre'    => $_POST['nombre'],
                    'tipologia' => $_POST['tipologia'],
                    'entidad'   => $_POST['entidad'],
                    'estado'    => $_POST['estado'],
                ]
            );

            redirect('/proyectos');
        }

        view('proyectos-create', [
            'title'  => 'Registrar proyecto de inversión',
            'errors' => $validator->errors(),
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            redirect('/proyectos');
        }

        $proyecto = db()->query(
            'SELECT * FROM proyectos WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        if (!$proyecto) {
            redirect('/proyectos');
        }

        view('proyectos-edit', [
            'title'    => 'Editar proyecto de inversión',
            'proyecto' => $proyecto,
            'errors'   => [],
        ]);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            redirect('/proyectos');
        }

        $validator = new Validator($_POST, [
            'nombre'    => 'required|min:3|max:190',
            'tipologia' => 'required|min:3|max:190',
            'entidad'   => 'required|min:3|max:190',
            'estado'    => 'required',
        ]);

        if ($validator->passes()) {
            db()->query(
                'UPDATE proyectos
                 SET nombre = :nombre,
                     tipologia = :tipologia,
                     entidad = :entidad,
                     estado = :estado
                 WHERE id = :id',
                [
                    'id'        => $id,
                    'nombre'    => $_POST['nombre'],
                    'tipologia' => $_POST['tipologia'],
                    'entidad'   => $_POST['entidad'],
                    'estado'    => $_POST['estado'],
                ]
            );

            redirect('/proyectos');
        }

        $proyecto = db()->query(
            'SELECT * FROM proyectos WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        view('proyectos-edit', [
            'title'    => 'Editar proyecto de inversión',
            'proyecto' => $proyecto,
            'errors'   => $validator->errors(),
        ]);
    }

    public function destroy()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            db()->query(
                'DELETE FROM proyectos WHERE id = :id',
                ['id' => $id]
            );
        }

        redirect('/proyectos');
    }
}
