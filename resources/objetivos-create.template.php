<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl text-center">
        Registrar objetivo
    </h2>
</div>

<div class="w-full max-w-xl mx-auto">
    <form method="POST" action="/objetivos/store">
        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Tipo de objetivo</label>
            <div class="mt-2">
                <select 
                    name="tipo" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900"
                >
                    <option value="">Seleccione…</option>
                    <option value="INSTITUCIONAL" <?= (($_POST['tipo'] ?? '') === 'INSTITUCIONAL') ? 'selected' : '' ?>>
                        Institucional
                    </option>
                    <option value="PND" <?= (($_POST['tipo'] ?? '') === 'PND') ? 'selected' : '' ?>>
                        Plan Nacional de Desarrollo
                    </option>
                    <option value="ODS" <?= (($_POST['tipo'] ?? '') === 'ODS') ? 'selected' : '' ?>>
                        Objetivos de Desarrollo Sostenible
                    </option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Descripción</label>
            <div class="mt-2">
                <textarea 
                    name="descripcion" 
                    rows="3" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-4 py-2 text-gray-900"
                ><?= $_POST['descripcion'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full rounded-md bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 text-center text-sm font-semibold">
                Guardar &rarr;
            </button>
        </div>
    </form>

    <?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <?php foreach ($errors as $error): ?>
        <li class="text-xs">&rarr; <?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
