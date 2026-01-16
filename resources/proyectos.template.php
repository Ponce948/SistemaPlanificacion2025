<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
        Proyectos de inversión
    </h2>

    <p class="mt-3 text-lg text-gray-600 w-full max-w-3xl">
        Gestión de proyectos de inversión registrados en el SIPeIP. Aquí puedes revisar,
        actualizar o eliminar los proyectos según su estado y entidad responsable.
    </p>
</div>

<div class="mb-6 flex justify-between items-center">
    <p class="text-sm text-gray-500">
        Total de proyectos registrados: <span class="font-semibold"><?= count($proyectos) ?></span>
    </p>

    <a href="/proyectos/create"
       class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
        + Registrar proyecto
    </a>
</div>

<div class="overflow-x-auto bg-white shadow rounded-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipología</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entidad</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            <?php if (empty($proyectos)): ?>
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                        No hay proyectos de inversión registrados. Usa el botón
                        <span class="font-semibold">“Registrar proyecto”</span> para crear uno nuevo.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($proyectos as $proyecto): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700"><?= $proyecto['id'] ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($proyecto['nombre']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($proyecto['tipologia']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($proyecto['entidad']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                <?= $proyecto['estado'] === 'APROBADO' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                <?= htmlspecialchars($proyecto['estado']) ?>
                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm text-right">
                            <form action="/proyectos/delete" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-red-600 hover:bg-red-700 rounded-md mr-2"
                                    onclick="return confirm('¿Eliminar este proyecto?');"
                                >
                                    Eliminar
                                </button>
                            </form>

                            <a href="/proyectos/edit?id=<?= $proyecto['id'] ?>"
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
