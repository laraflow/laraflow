import {usePage} from "@inertiajs/vue3";

export function useAuth() {

    const page = usePage();
    const user = page.props.auth.user;

    const fullName = () => {
        return user?.name ?? 'Anonymous User';
    }

    const profileImage = () => {

        let url = new URL(`https://ui-avatars.com/api/`);
        let options = new URLSearchParams(url.search);

        options.append("name", fullName());
        options.append("background", `random`);
        options.append("color", `fff`);
        options.append("size", 90);
        options.append("bold", 'true');
        options.append("uppercase", 'true');

        return `${url.toString()}/?${options.toString()}`;
    }

    return {fullName, profileImage}
}
