let e=document.querySelector("#recipe-ingredients").childElementCount;function i(){e++;const t=document.createElement("div");t.id="ingredient"+e,t.className="my-5 flex items-center justify-center",t.innerHTML=`
        <i class="fas fa-bars text-red-800"></i>
        <input type="text" name="ingredients[${e-1}][material]" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <input type="text" name="ingredients[${e-1}][quantity]" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        <i class="delete-ingredient fas fa-times text-red-800"></i>
    `,document.querySelector("#recipe-ingredients").appendChild(t)}function r(){e>1&&(document.getElementById("ingredient"+e).remove(),e--)}window.addEventListener("DOMContentLoaded",t=>{document.querySelector("#ingredients-container").addEventListener("click",function(n){n.target.classList.contains("add-ingredient")?(n.preventDefault(),i()):n.target.classList.contains("delete-ingredient")&&(n.preventDefault(),r())})});
