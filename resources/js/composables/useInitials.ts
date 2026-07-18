// export type UseInitialsReturn = {
//     getInitials: (fullName?: string) => string;
// };

// function getInitial(name: string): string {
//     return Array.from(name)[0] ?? '';
// }

// export function getInitials(fullName?: string): string {
//     if (!fullName) {
//         return '';
//     }

//     const names = fullName.trim().split(/\s+/u).filter(Boolean);

//     if (names.length === 0) {
//         return '';
//     }

//     if (names.length === 1) {
//         return getInitial(names[0]).toUpperCase();
//     }

//     return `${getInitial(names[0])}${getInitial(names[names.length - 1])}`.toUpperCase();
// }

// export function useInitials(): UseInitialsReturn {
//     return { getInitials };
// }

export type UseInitialsReturn = {
    getInitials: (firstName?: string, lastName?: string) => string;
};

function getInitial(name?: string): string {
    return Array.from(name?.trim() ?? '')[0] ?? '';
}

export function getInitials(
    firstName?: string,
    lastName?: string,
): string {
    const firstInitial = getInitial(firstName);
    const lastInitial = getInitial(lastName);

    return `${firstInitial}${lastInitial}`.toUpperCase();
}

export function useInitials(): UseInitialsReturn {
    return { getInitials };
}
