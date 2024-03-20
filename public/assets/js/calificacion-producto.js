const containerProductLike = document.querySelectorAll(".card__producto__historia");
const heartIcon = document.querySelectorAll(".agregar__like");
let liked = [];


// Crear dos funciones llamadas como los import de icons 
// retornarlas con backtips y agregar un atributo que se llame
// data-hidden

const iconLiked = ()=>{
    return `<i class="fa-solid fa-heart"></i>`;
}

const iconUnlike = ()=>{
    return `<i class="fa-regular fa-heart"></i>`;

}


const handleClickLike = () => {
    for (let i = 0; i < heartIcon.length; i++) {
        heartIcon[i].addEventListener("click", () => {
            const id = Number(containerProductLike[i].getAttribute("data-id"));
            const isLiked = Boolean(heartIcon[i].getAttribute("data-hidden"));

            if (!isLiked) {
                addObjectToLocalStorage(deleteLike(id));
                return;
            }

            if (validateLikeExist(id).includes(true)) return;
            addJsonToObject({ id: id, boolean: isLiked });
        });
    }
};

const addObjectToLocalStorage = (objecto = []) => {
    localStorage.setItem("isLiked", JSON.stringify(objecto));
};

const getLikesLocalStorage = () => {
    return JSON.parse(localStorage.getItem("isLiked"));
};

const addJsonToObject = ({ id, boolean }) => {
    const infoIcon = {
        uuid: id,
        isLiked: boolean,
    };

    liked.push(infoIcon);
    validateLikes(liked);
    liked = [];
};

const validateLikeExist = (iconUUID) => {
    return getLikesLocalStorage().map((icon) => {
        return icon.uuid === iconUUID;
    });
};

const validateLikes = (newLike) => {
    let previousLikes = [...getLikesLocalStorage()];
    let currentLike = [];

    if (previousLikes.length <= 0) currentLike = [...newLike];
    else currentLike = [...previousLikes, ...newLike];

    addObjectToLocalStorage(currentLike);
};


const changeIcon = () => {
    for (let i = 0; i < heartIcon.length; i++) {
        heartIcon[i].addEventListener("click", () => {
            const isLiked = Boolean(heartIcon[i].getAttribute("data-hidden"));
            if (isLiked) {
                heartIcon[i].innerHTML = iconUnlike();
                heartIcon[i].removeAttribute("data-hidden");
            } else {
                heartIcon[i].innerHTML = iconLiked();
                heartIcon[i].setAttribute("data-hidden", "true");
            }
        });
    }
};

const paintIcon = () => {
    const localIconID = getLikesLocalStorage().map((icons) => {
        return icons.uuid;
    });


    heartIcon.forEach((icons) => {
        const parentLowestChild = icons.parentNode
        const parentChild = parentLowestChild.parentNode
        const parentElement = parentChild.parentNode
        console.log(parentElement);

        const elementID = Number(parentElement.getAttribute("data-id"));
        console.log(localIconID.includes(elementID) === true);
        if (localIconID.includes(elementID) === true) {
            icons.innerHTML = iconLiked();
            icons.setAttribute("data-hidden", true);
        } else {
            icons.innerHTML = iconUnlike();
            // icons.setAttribute("data-hidden", false);
        }
    });
};

const deleteLike = (iconUUID) => {
    return getLikesLocalStorage().filter((icon) => {
        const { uuid } = icon;
        return iconUUID !== uuid;
    });
};

// Inicializar el localStorage
if (getLikesLocalStorage() === null) addObjectToLocalStorage();

paintIcon()
changeIcon()
handleClickLike()
