export type User = {
	id: string;
	name: string;
	email: string;
}

export type Company = {
	id: string;
	name: string;
	description: string;
	logo: string;
	email: string;
	phone: string;
	website: string;
	region: string;
	location: string;
	owner_id: string;
	jobs: Job[];
	jobs_count: number;
	created_at: string;
	updated_at: string
}

export type Job = {
	id: string;
	name: string;
	description: string;
	company: Company;
	employment_type: 'full-time' | 'part-time' | 'internship';
	experience_level: 'beginner' | 'intermediate' | 'expert';
	location: string;
	region: string;
	created_at: string;
	updated_at: string
}

export type Application = {
	id?: string;
	name: string,
	residence: string,
	email: string,
	phone: string,
	application_letter: string,
	files: File[],
	job_id?: string,
	user_id?: string
}

export type Pagination<T> = {
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
		url: string; label: string; active: boolean;
	}[];
	data: T[];
}

export type Alert = {
	type: "success" | "info" | "warn" | "error" | undefined;
	message: string;
}

export type ConditionalArray<T extends boolean> = T extends true ? string[] : string

export type KeyTypeSelector<T, K extends keyof T> = T[K]
