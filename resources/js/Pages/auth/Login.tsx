import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Label } from "@/components/ui/label";
import { Checkbox } from "@/components/ui/checkbox";
import {Link, useForm} from "@inertiajs/react";
import {FormEvent} from "react";
import route from "ziggy-js";

export default function Login() {
	const form = useForm({
		email: '',
		password: '',
		remember: false
	})

	function handleSubmit(e: FormEvent<HTMLFormElement>) {
		e.preventDefault();
		form.post('/auth/login');
	}

	return (
		<>
			<div className="h-screen flex items-center justify-center">
				<div className="space-y-6 w-80">
					<div className="space-y-2 text-center">
						<h1 className="text-2xl font-semibold tracking-tight">Login</h1>
						<p className="text-sm text-muted-foreground">Enter your credentials to enter your account</p>
					</div>
					<form onSubmit={handleSubmit} className="space-y-3">
						<div>
							<Label className="sr-only" htmlFor="email" />
							<Input value={form.data.email} onChange={e => form.setData('email', e.currentTarget.value)} id="email" placeholder="email@example.com" type="email" autoComplete="email"/>
							{form.errors.email && (
								<span className="block mt-2 text-xs text-red-500">{form.errors.email}</span>
							)}
						</div>
						<div>
							<Label className="sr-only" htmlFor="password" />
							<Input value={form.data.password} onChange={e => form.setData('password', e.currentTarget.value)} id="password" type="password" placeholder="*****" autoComplete="current-password"/>
							{form.errors.password && (
								<span className="block mt-2 text-xs text-red-500">{form.errors.password}</span>
							)}
						</div>
						<div className="flex items-center gap-2">
							<Checkbox id="remember" checked={form.data.remember} onCheckedChange={e => form.setData('remember', e)} />
							<Label className="text-sm font-normal" htmlFor="remember">Remember me</Label>
						</div>
						<Button type="submit" className="w-full">Login</Button>
					</form>
				</div>
			</div>
			<Button variant="ghost" asChild className="absolute top-10 right-10">
				<Link href={route('auth.register')}>
					Register
				</Link>
			</Button>
		</>

	)
}
