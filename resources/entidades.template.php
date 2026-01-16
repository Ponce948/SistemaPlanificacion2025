<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
        Entidades del sector público
    </h2>

    <p class="mt-3 text-lg text-gray-600 w-full max-w-3xl">
        Módulo de configuración institucional del SIPeIP. Desde aquí puedes registrar,
        actualizar o eliminar las entidades que forman parte de la planificación.
    </p>
</div>

<div class="mb-6 flex justify-between items-center">
    <p class="text-sm text-gray-500">
        Total de entidades registradas: <span class="font-semibold"><?= count($entidades) ?></span>
    </p>

    <a href="/entidades/create"
       class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
        + Registrar entidad
    </a>
</div>

<div class="overflow-x-auto bg-white shadow rounded-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subsector</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel de gobierno</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            <?php if (empty($entidades)): ?>
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-sm text-gray-500">
                        No hay entidades registradas todavía. Usa el botón <span class="font-semibold">“Registrar entidad”</span>
                        para crear la primera.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($entidades as $entidad): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700"><?= $entidad['id'] ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($entidad['codigo']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($entidad['nombre']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($entidad['subsector']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700"><?= htmlspecialchars($entidad['nivel_gobierno']) ?></td>
                        <td class="px-4 py-2 text-sm text-gray-700">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                <?= $entidad['estado'] === 'ACTIVO' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' ?>">
                                <?= htmlspecialchars($entidad['estado']) ?>
                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm text-right">
                            <form action="/entidades/delete" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $entidad['id'] ?>">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-red-600 hover:bg-red-700 rounded-md mr-2"
                                    onclick="return confirm('¿Eliminar esta entidad?');"
                                >
                                    Eliminar
                                </button>
                            </form>

                            <a href="/entidades/edit?id=<?= $entidad['id'] ?>"
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
