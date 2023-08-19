import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Label } from "@/components/ui/label";
import { Checkbox } from "@/components/ui/checkbox";
import {Link, useForm} from "@inertiajs/react";
import {FormEvent} from "react";
import route from "ziggy-js";
import FormField from "@/components/FormField";
import {KeyTypeSelector, Company} from "@/lib/types";

type Login = {
	email: string,
	password: string,
	remember: boolean
}

export default function Login() {
	const form = useForm<Login>({
		email: '',
		password: '',
		remember: false
	})

	function setData<K extends keyof Login>(name: K, value: KeyTypeSelector<Login, K>) {
		form.setData(name, value);
		if (form.errors[name]) form.clearErrors(name);
	}

	function handleSubmit(e: FormEvent<HTMLFormElement>) {
		e.preventDefault();
		form.post('/auth/login');
	}

	return (
		<>
			<div className="space-y-6 w-80">
				<div className="space-y-2 text-center">
					<h1 className="text-2xl font-semibold tracking-tight">Login</h1>
					<p className="text-sm text-muted-foreground">Enter your credentials to enter your account</p>
				</div>
				<form onSubmit={handleSubmit} className="space-y-4">
					<FormField name="Email" onChange={e => setData('email', e.currentTarget.value)} error={form.errors.email}/>
					<FormField name="Password" onChange={e => setData('password', e.currentTarget.value)} error={form.errors.password}/>
					<div className="flex items-center gap-2">
						<Checkbox id="remember" checked={form.data.remember} onCheckedChange={e => form.setData('remember', e as boolean)} />
						<Label className="text-sm font-normal" htmlFor="remember">Remember me</Label>
					</div>
					<Button type="submit" dusk="submit" className="w-full">Login</Button>
				</form>
			</div>
			<Button variant="ghost" asChild className="absolute top-10 right-10">
				<Link href={route('auth.register')}>
					Register
				</Link>
			</Button>
		</>
	)
}
