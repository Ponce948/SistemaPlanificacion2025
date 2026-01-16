<?php require __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Editar proyecto de inversión</h1>

    <form action="/proyectos/update" method="POST" class="space-y-4 bg-white shadow rounded-lg p-6">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre del proyecto</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($proyecto['nombre']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tipología</label>
            <input type="text" name="tipologia" value="<?= htmlspecialchars($proyecto['tipologia']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Entidad responsable</label>
            <input type="text" name="entidad" value="<?= htmlspecialchars($proyecto['entidad']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="EN FORMULACIÓN" <?= $proyecto['estado'] === 'EN FORMULACIÓN' ? 'selected' : '' ?>>En formulación</option>
                <option value="EN EVALUACIÓN" <?= $proyecto['estado'] === 'EN EVALUACIÓN' ? 'selected' : '' ?>>En evaluación</option>
                <option value="APROBADO" <?= $proyecto['estado'] === 'APROBADO' ? 'selected' : '' ?>>Aprobado</option>
                <option value="EJECUCIÓN" <?= $proyecto['estado'] === 'EJECUCIÓN' ? 'selected' : '' ?>>En ejecución</option>
                <option value="FINALIZADO" <?= $proyecto['estado'] === 'FINALIZADO' ? 'selected' : '' ?>>Finalizado</option>
            </select>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">
                Actualizar proyecto
            </button>
            <a href="/proyectos" class="text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
        </div>

        <?php if (!empty($errors)): ?>
            <ul class="mt-4 text-red-500 text-sm">
                <?php foreach ($errors as $error): ?>
                    <li>&rarr; <?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </form>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
