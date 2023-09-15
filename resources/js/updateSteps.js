// 最初のステップの数を取得
let stepCount = document.querySelectorAll('#recipe-steps .container').length;

// ステップを追加する
function addStep() {
    stepCount++;

    const div = document.createElement('div');
    div.id = 'step' + stepCount;
    div.className = 'container mx-auto flex flex-row px-5 py-10 md:flex-row items-center';

    div.innerHTML = `
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <!--テキスト入力欄-->
        <label for="content" class="sm:text-xl text-2xl font-bold mb-4 text-red-800">Step ${stepCount} </label>
        <textarea name="steps[${stepCount-1}][content]" id="content${stepCount}" rows="4" class="w-full my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></textarea>

        <!--ステップ写真のアップロード-->
        <label class="flex w-1/5 cursor-pointer appearance-none justify-center rounded-md border border-dashed border-gray-300 bg-white px-3 py-6 text-sm transition hover:border-gray-400 focus:border-solid focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75" tabindex="0">
            <span for="photo-dropbox" class="flex items-center space-x-2">
            <svg class="h-6 w-6 stroke-gray-400" viewBox="0 0 256 256">
                <path d="M96 208H72A56 56 0 0172 96a57.5 57.5.0 0113.9 1.7" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                <path d="M80 128a80 80 0 11144 48" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                <polyline points="118.1 161.9 152 128 185.9 161.9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                <line x1="152" y1="208" x2="152" y2="128" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line></svg>
                <span class="text-xs font-medium text-gray-600">クリックして写真をアップロード</span>
            <input name="steps[${stepCount-1}][step_photo_path]" id="step_photo_path" type="file" class="sr-only">
        </label>
        <div class="flex justify-center my-3">
            <button type="button" class="add-step inline-flex text-white bg-red-800 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">追加</button>
            <button type="button" class="delete-step ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
        </div>
    </div>
    `;

    document.querySelector('#recipe-steps').appendChild(div);
}

// ステップを削除する
function deleteStep() {
    if (stepCount > 1) {
        document.getElementById('step' + stepCount).remove();
        stepCount--;
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('#steps-container').addEventListener('click', function(e) {
        if(e.target.classList.contains('add-step')) {
            e.preventDefault();
            addStep();
        } else if(e.target.classList.contains('delete-step')) {
            e.preventDefault();
            deleteStep();
        }
    });
});
