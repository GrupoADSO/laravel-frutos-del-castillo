// import { containerProduct } from "./carrito.js";
// import { iconLiked, iconUnlike } from "../Icons/icons.js";
const containerProductLike = document.querySelectorAll(".card__producto__historia");
const heartIcon = document.querySelectorAll(".agregar__like");
let liked = [];

// Crear dos funciones llamadas como los import de icons 
// retornarlas con backtips y agregar un atributo que se llame
// data-hidden

const iconLike = ()=>{
    const like = `<i class="fa-regular fa-heart"></i>`;
    return like;
}

const iconDisLike = ()=>{
    const disLike = `<i class="fa-regular fa-heart"></i>`;
    return disLike;
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
        const elementID = Number(icons.parentElement.getAttribute("data-id"));
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

// export { paintIcon, changeIcon, handleClickLike };