export interface User {
	id: string;
	name: string;
	email: string;
}

export interface Company {
	id: string;
	name: string;
	description: string;
	logo: string | File;
	email: string;
	phone: string;
	website: string;
	region: string;
	location: string;
	owner_id: string
}

export interface Pagination<T> {
	current_page: number;
	first_page_url: string;
	from: number;
	last_page: number;
	last_page_url: string;
	next_page_url: string;
	path: string;
	per_page: number;
	prev_page_url: string;
	to: number;
	total: number;
	links: {
		url: string;
		label: string;
		active: boolean;
	}[];
	data: T[];
}