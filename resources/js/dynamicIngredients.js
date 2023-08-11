//ステップ数を最初に1から始まる
let ingredientCount = document.querySelector('#recipe-ingredients').childElementCount;

//ステップを追加する
function addIngredient() {
    ingredientCount++;
    const div = document.createElement('div');
    div.id = 'ingredient' + ingredientCount;
    div.className = 'my-5 flex items-center justify-center';
    div.innerHTML = `
        <i class="fas fa-bars text-red-800"></i>
        <input type="text" name="ingredients[${ingredientCount-1}][material]" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <input type="text" name="ingredients[${ingredientCount-1}][quantity]" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <i class="delete-ingredient fas fa-times text-red-800"></i>
    `;

    document.querySelector('#recipe-ingredients').appendChild(div);
}

//ステップを削除する
function deleteIngredient() {
    if (ingredientCount > 1) {
        document.getElementById('ingredient' + ingredientCount).remove();
        ingredientCount--;
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('#ingredients-container').addEventListener('click', function(e) {
        if(e.target.classList.contains('add-ingredient')) {
            e.preventDefault();
            addIngredient();
        } else if(e.target.classList.contains('delete-ingredient')) {
            e.preventDefault();
            deleteIngredient();
        }
    });
})