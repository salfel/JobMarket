import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { Label } from "@/components/ui/label";
import {useModel} from "@/lib/hooks";
import {CardContent, CardDescription, CardHeader, CardTitle} from "@/components/ui/card";
import {Link, useForm} from "@inertiajs/react";
import route from "ziggy-js";

export default function Login() {
	const [username, setUsername, useUsername] = useModel('');
	const [password, setPassword, usePassword] = useModel('');

	let form = useForm({
		username: '',
		password: ''
	})
	return (
		<>
			<CardHeader>
				<CardTitle>Login</CardTitle>
			</CardHeader>
			<CardContent>
				<form className="space-y-5">
					<div>
						<Label htmlFor="username">Username</Label>
						<Input id="username" value={username} onChange={useUsername} />
					</div>
					<div>
						<Label htmlFor="password">Password</Label>
						<Input id="password" value={password} onChange={usePassword} />
					</div>
					<Button>Login</Button>
				</form>
			</CardContent>
		</>
	)
}
