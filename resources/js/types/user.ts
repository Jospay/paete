export interface User {
    id: number;

    first_name: string;
    middle_name: string | null;
    last_name: string;

    full_name: string;
    initials: string;

    email: string;
    email_verified: boolean;
    email_verified_at: string | null;

    mobile_number: string | null;

    date_of_birth: string | null;
    civil_status: string | null;
    address: string | null;

    occupation: string | null;
    source_of_income: string | null;

    tin: string | null;

    id_type: string | null;
    id_number: string | null;

    roles: string[];
    primary_role: string | null;

    created_at: string;
    updated_at: string;

    can: {
        view: boolean;
        update: boolean;
        delete: boolean;
    };
}
