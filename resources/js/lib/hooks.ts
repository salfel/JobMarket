import {ChangeEventHandler, useState} from "react";

export function useModel<T>(initial: T) {
	const [value, setValue] = useState<T>(initial)
	const handler: ChangeEventHandler<HTMLInputElement> = (e) => {
		setValue(e.currentTarget.value)
	}
	const model = { value, onChange: handler };
	return [model, setValue];
}
