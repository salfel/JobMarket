import {ChangeEventHandler, useState} from "react";

export function useModel<T>(val: T) {
	const [value, setValue] = useState(val);
	const handler: ChangeEventHandler<HTMLInputElement> = (e) => {
		setValue(e.currentTarget.value)
	}
	return [value, setValue, handler];
}
