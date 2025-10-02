<div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs font-semibold">
            <tr>
                {{ $head }}
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            {{ $slot }}
        </tbody>
    </table>
</div>
