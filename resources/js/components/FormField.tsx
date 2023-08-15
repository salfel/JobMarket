import {Label} from "@/components/ui/label";
import {Input} from "@/components/ui/input";
import React from "react";

type Props = {
	value?: string,
	name: string,
	error?: string,
	className?: string,
	children?: React.ReactNode
}

export default function FormField({ error, name, className, children, ...props }: Props & React.InputHTMLAttributes<HTMLInputElement>) {
	return (
		<div className={className}>
			<Label className="block mb-1" htmlFor="email">{name}</Label>
			{children
				? children
				: <Input  {...props} />
			}
			{error && (
				<span className="block mt-2 text-xs text-red-500">{error}</span>
			)}
		</div>
	)
}
