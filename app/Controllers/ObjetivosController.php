<?php

namespace App\Controllers;

use Framework\Validator;

class ObjetivosController
{
    public function index()
    {
        $objetivos = db()->query('SELECT * FROM objetivos ORDER BY id DESC')->get();

        view('objetivos', [
            'title'     => 'Objetivos estratégicos',
            'objetivos' => $objetivos,
        ]);
    }

    public function create()
    {
        view('objetivos-create', [
            'title'  => 'Registrar objetivo',
            'errors' => [],
        ]);
    }

    public function store()
    {
        $validator = new Validator($_POST, [
            'tipo'        => 'required',
            'descripcion' => 'required|min:5',
        ]);

        if ($validator->passes()) {
            db()->query(
                'INSERT INTO objetivos (descripcion, tipo) VALUES (:descripcion, :tipo)',
                [
                    'descripcion' => $_POST['descripcion'],
                    'tipo'        => $_POST['tipo'],
                ]
            );

            redirect('/objetivos');
        }

        view('objetivos-create', [
            'title'  => 'Registrar objetivo',
            'errors' => $validator->errors(),
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            redirect('/objetivos');
        }

        $objetivo = db()->query(
            'SELECT * FROM objetivos WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        if (!$objetivo) {
            redirect('/objetivos');
        }

        view('objetivos-edit', [
            'title'    => 'Editar objetivo estratégico',
            'objetivo' => $objetivo,
            'errors'   => [],
        ]);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            redirect('/objetivos');
        }

        $validator = new Validator($_POST, [
            'tipo'        => 'required',
            'descripcion' => 'required|min:5',
        ]);

        if ($validator->passes()) {
            db()->query(
                'UPDATE objetivos
                 SET descripcion = :descripcion,
                     tipo = :tipo
                 WHERE id = :id',
                [
                    'id'          => $id,
                    'descripcion' => $_POST['descripcion'],
                    'tipo'        => $_POST['tipo'],
                ]
            );

            redirect('/objetivos');
        }

        $objetivo = db()->query(
            'SELECT * FROM objetivos WHERE id = :id',
            ['id' => $id]
        )->firstOrFail();

        view('objetivos-edit', [
            'title'    => 'Editar objetivo estratégico',
            'objetivo' => $objetivo,
            'errors'   => $validator->errors(),
        ]);
    }

    public function destroy()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            db()->query(
                'DELETE FROM objetivos WHERE id = :id',
                ['id' => $id]
            );
        }

        redirect('/objetivos');
    }
}
