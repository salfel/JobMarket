import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Label } from "@/components/ui/label";
import { Checkbox } from "@/components/ui/checkbox";
import {Link, useForm} from "@inertiajs/react";
import {FormEvent} from "react";
import route from "ziggy-js";

export default function Login() {
	const form = useForm({
		name: '',
		email: '',
		password: '',
		password_confirmation: ''
	})

	function handleSubmit(e: FormEvent<HTMLFormElement>) {
		e.preventDefault();
		form.post('/auth/register');
	}

	return (
		<>
			<div className="space-y-6 w-80">
				<div className="space-y-2 text-center">
					<h1 className="text-2xl font-semibold tracking-tight">Register</h1>
					<p className="text-sm text-muted-foreground">Enter your credentials to create an account</p>
				</div>
				<form onSubmit={handleSubmit} className="space-y-4">
					<div>
						<Label className="block mb-1" htmlFor="name">Name</Label>
						<Input value={form.data.name} onChange={e => form.setData('name', e.currentTarget.value)} id="name" type="text" autoComplete="email" placeholder="John Doe"/>
						{form.errors.name && (
							<span className="block mt-2 text-xs text-red-500">{form.errors.name}</span>
						)}
					</div>
					<div>
						<Label htmlFor="email">Email</Label>
						<Input value={form.data.email} onChange={e => form.setData('email', e.currentTarget.value)} id="email" placeholder="email@example.com" type="email" autoComplete="email"/>
						{form.errors.email && (
							<span className="block mt-2 text-xs text-red-500">{form.errors.email}</span>
						)}
					</div>
					<div>
						<Label className="block mb-1" htmlFor="password">Password</Label>
						<Input value={form.data.password} onChange={e => form.setData('password', e.currentTarget.value)} id="password" type="password" placeholder="*****" autoComplete="new-password"/>
						{form.errors.password && (
							<span className="block mt-2 text-xs text-red-500">{form.errors.password}</span>
						)}
					</div>
					<div>
						<Label className="block mb-1" htmlFor="password_confirmation">Password Confirmation</Label>
						<Input value={form.data.password_confirmation} onChange={e => form.setData('password_confirmation', e.currentTarget.value)} id="password_confirmation" type="password" placeholder="*****" autoComplete="new-password" />
						{form.errors.password_confirmation && (
							<span className="block mt-2 text-xs text-red-500">{form.errors.password_confirmation}</span>
						)}
					</div>
					<Button type="submit" className="w-full">Login</Button>
				</form>
			</div>
			<Button variant="ghost" asChild className="absolute top-10 right-10">
				<Link href={route('auth.login')}>
					Login
				</Link>
			</Button>
		</>
	)
}
