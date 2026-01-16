<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
        Objetivos estratégicos
    </h2>

    <p class="mt-3 text-lg text-gray-600 w-full max-w-3xl">
        Administra los objetivos estratégicos que orientan la planificación institucional.
        Puedes registrar, actualizar o eliminar objetivos según el avance de la gestión.
    </p>
</div>

<div class="mb-6 flex justify-between items-center">
    <p class="text-sm text-gray-500">
        Total de objetivos registrados: <span class="font-semibold"><?= count($objetivos) ?></span>
    </p>

    <a href="/objetivos/create"
       class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
        + Registrar objetivo
    </a>
</div>

<div class="overflow-x-auto bg-white shadow rounded-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            <?php if (empty($objetivos)): ?>
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">
                        No se han registrado objetivos aún. Usa el botón
                        <span class="font-semibold">“Registrar objetivo”</span> para crear el primero.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($objetivos as $objetivo): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700"><?= $objetivo['id'] ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($objetivo['tipo']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($objetivo['descripcion']) ?></td>
                        <td class="px-4 py-2 text-sm text-right">
                            <form action="/objetivos/delete" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $objetivo['id'] ?>">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-red-600 hover:bg-red-700 rounded-md mr-2"
                                    onclick="return confirm('¿Eliminar este objetivo?');"
                                >
                                    Eliminar
                                </button>
                            </form>

                            <a href="/objetivos/edit?id=<?= $objetivo['id'] ?>"
                               class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">
                                Editar &rarr;
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
