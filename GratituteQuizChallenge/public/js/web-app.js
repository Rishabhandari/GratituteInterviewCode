const deleteQuestion = (questionId) => {
    postApiRequest("delete", questionId);
    window.location.reload();
};

const addQuestion = () => {
    const question = {
        category_id: document.querySelector("#questionCategory").value,
        question_name: document.querySelector("#questionText").value,
        option1: document.querySelector("#option1").value,
        option2: document.querySelector("#option2").value,
        option3: document.querySelector("#option3").value,
        option4: document.querySelector("#option4").value,
    };
    postApiRequest("api/question", question);
    toastService("success", "Successfully created ").show();
};

const fetchCategories = () => {
    const navbarList = document
        .querySelector("#navbarSupportedContent")
        .querySelector("ul");
    getApiRequest("api/category").then((categories) => {
        categories.data.forEach((category) => {
            const listElement = document.createElement("li");
            listElement.classList.add("nav-item");
            listElement.innerHTML = ` 
        <a class="nav-link" href='#' onclick="fRoute('dynamic-questions?type=${category.type}')">
                 ${category.type} Questions
             </a>`;
            navbarList.appendChild(listElement);
        });
    });
};
