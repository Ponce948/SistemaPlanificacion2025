<?php require __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Editar entidad</h1>

    <form action="/entidades/update" method="POST" class="space-y-4 bg-white shadow rounded-lg p-6">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $entidad['id'] ?>">

        <div>
            <label class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" name="codigo" value="<?= htmlspecialchars($entidad['codigo']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($entidad['nombre']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Subsector</label>
            <input type="text" name="subsector" value="<?= htmlspecialchars($entidad['subsector']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nivel de gobierno</label>
            <input type="text" name="nivel_gobierno" value="<?= htmlspecialchars($entidad['nivel_gobierno']) ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="ACTIVO" <?= $entidad['estado'] === 'ACTIVO' ? 'selected' : '' ?>>ACTIVO</option>
                <option value="INACTIVO" <?= $entidad['estado'] === 'INACTIVO' ? 'selected' : '' ?>>INACTIVO</option>
            </select>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">
                Actualizar entidad
            </button>
            <a href="/entidades" class="text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
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
