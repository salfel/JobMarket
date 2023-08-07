import React from "react"
import type { Job } from '@/lib/types'

interface Props {
	job: Job
}

export default function JobPreview({ job }: Props) {
	return <div>{job.name}</div>
}
