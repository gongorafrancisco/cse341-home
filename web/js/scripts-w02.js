const clikBtn = document.getElementById("clickMe");
/* const formColor = document.getElementById("formColor");
const colorInput = document.getElementById("colorInput");
const divCon01 = document.getElementById("con-01"); */
clikBtn.addEventListener('click', () => {
    alert("Clicked");
}
    );

    $("#formColor").submit(function(event) {
        event.preventDefault();
        let color = $("#colorInput");
        $("#con-01").attr("style", `background: ${color.val()} !important`);
    });
/* formColor.addEventListener('submit', changeBackground);

function changeBackground(event) {
    event.preventDefault();
    divCon01.style.background = colorInput.value;
} */
$("#fadeInOut").click(function() {
    $("#con-03").fadeToggle("slow", "linear");
});