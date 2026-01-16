<?php require __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Editar objetivo estratégico</h1>

    <form action="/objetivos/update" method="POST" class="space-y-4 bg-white shadow rounded-lg p-6">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $objetivo['id'] ?>">

        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo</label>
            <select name="tipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="PND" <?= $objetivo['tipo'] === 'PND' ? 'selected' : '' ?>>Plan Nacional de Desarrollo</option>
                <option value="ODS" <?= $objetivo['tipo'] === 'ODS' ? 'selected' : '' ?>>Objetivo de Desarrollo Sostenible</option>
                <option value="PEI" <?= $objetivo['tipo'] === 'PEI' ? 'selected' : '' ?>>Plan Estratégico Institucional</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($objetivo['descripcion']) ?></textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">
                Actualizar objetivo
            </button>
            <a href="/objetivos" class="text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
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
